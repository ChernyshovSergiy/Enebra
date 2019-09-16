<?php

namespace App\Traits\Methods;

trait ToggleActive
{
    public function active()
    {
        $this->is_active = 1;
        $this->save();
    }

    public function notActive()
    {
        $this->is_active = 0;
        $this->save();
    }

    public function toggleActive( $id)
    {
        $toggle = self::find($id);
        if ($toggle->is_active === 0)
        {
            return $toggle->active();
        }
        return $toggle->notActive();
    }

    public function getActivePoints() :array
    {
        $active = self::all()->filter(static function ($item) {
            return $item['is_active'] === 1;
        });
        return $active->flatten()->all();
    }

    public function getActivePointsIdTitle() :array
    {
        $active = self::all()->filter(static function ($item) {
            return $item['is_active'] === 1;
        });
        return $active->flatten()->keyBy('title')->all();
    }
}

