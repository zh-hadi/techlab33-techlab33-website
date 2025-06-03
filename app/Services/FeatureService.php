<?php

namespace App\Services;

use App\Models\Feature;

class FeatureService {

    public function __construct(private FileService $fileService){}
    public function store(array $data)
    {
        if(isset($data['image']) && $data['image']){
           $path = $this->fileService->upload('ab/check/', $data['image']);
           $data['image'] = $path;
        }else {
            $data['image'] = null;
        }

        return Feature::create($data);
    }

    public function update(Feature $feature, array $data)
    {
        if(isset($data['image']) && $data['image']){
            $this->fileService->delete($feature->image);

            $path = $this->fileService->upload('feature/image/', $data['image']);
            $data['image'] = $path;
        }

        return $feature->update($data);
    }

    public function delete(Feature $feature)
    {
        if($feature->image){
            $this->fileService->delete($feature->image);
        }

        $feature->delete();
        return true;
    }
}