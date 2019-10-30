<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Profile extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function getAvatarAttribute()
    {
        if ($this->photo !== null) {
            if (filter_var($this->photo, FILTER_VALIDATE_URL)) {
                return $this->photo;
            }

            return storage_path($this->photo);
        }

        return '/images/gib-logo.png';
    }

    public function getFacebookLinkAttribute()
    {
        if (filter_var($this->facebook, FILTER_VALIDATE_URL)) {
            return $this->facebook;
        } else if ($this->facebook !== null) {
            return 'https://www.facebook.com/' . $this->facebook;
        }
        return null;
    }

    public function getYoutubeLinkAttribute()
    {
        if (filter_var($this->youtube, FILTER_VALIDATE_URL)) {
            return $this->youtube;
        } else if ($this->youtube !== null) {
            return 'https://www.youtube.com/channel/' . $this->youtube;
        }
        return null;
    }

    public function getInstagramLinkAttribute()
    {
        if (filter_var($this->instagram, FILTER_VALIDATE_URL)) {
            return $this->instagram;
        } else if ($this->instagram !== null) {
            return 'https://www.instagram.com/' . $this->instagram;
        }

        return null;
    }

    public function getTwitterLinkAttribute()
    {
        if (filter_var($this->twitter, FILTER_VALIDATE_URL)) {
            return $this->twitter;
        } else if ($this->twitter !== null) {
            return 'https://twitter.com/' . $this->twitter;
        }
        return null;
    }

    public function getFacebookUserAttribute()
    {
        $link = $this->getFacebookLinkAttribute();

        if ($link !== null) {
            $data = explode('/', $link);
            return '@' . Arr::last($data);
        }

        return null;
    }

    public function getTwitterUserAttribute()
    {
        $link = $this->getTwitterLinkAttribute();

        if ($link !== null) {
            $data = explode('/', $link);
            return '@' . Arr::last($data);
        }

        return null;
    }

    public function getInstagramUserAttribute()
    {
        $link = $this->getInstagramLinkAttribute();

        if ($link !== null) {
            $data = explode('/', $link);
            return '@' . Arr::last($data);
        }

        return null;
    }

    public function getYoutubeUserAttribute()
    {
        $link = $this->getYoutubeLinkAttribute();

        if ($link !== null) {
            $data = explode('/', $link);
            return '@' . Arr::last($data);
        }

        return null;
    }
}
