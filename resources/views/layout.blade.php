<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserAccountResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        $sex = ["0" => "男", "1" => "女"];
        return
            $data = [
                "data" => [
                    'id' => $this->id,
                    'account' => $this->account,
                    'name' => $this->name,
                    'sex' => $this->sex,
                    'birthday' => $this->birthday,
                    'email' => $this->email,
                    'remark' => $this->remark,
                    'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $this->created_at->format('Y-m-d H:i:s'),
                ],
                "meta" => $this->meta
            ];
    }
}
