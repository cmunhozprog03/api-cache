<?php

namespace App\Repositories;

use App\Models\Module;
use PHPUnit\Framework\MockObject\Builder\Identity;

class ModuleRepository
{

    protected $entity;

    public function __construct(Module $module)
    {
        $this->entity = $module;
    }

    public function getModuleCourse(int $courseId)
    {
        return $this->entity
                    ->where('course_id', $courseId)
                    ->get();
    }

    public function createNewModule(array $data)
    {
        return $this->entity->create($data);
    }

    public function getModuleByCourse(int $courseId, $identify)
    {
        return $this->entity
                    ->where('course_id', $courseId)
                    ->where('uuid', $identify)
                    ->firstOrFail();
    }

    public function getModuleByUuid(string $identify)
    {
        return $this->entity
                    ->where('uuid', $identify)
                    ->firstOrFail();
    }

    public function updateModuleByUuid(string $Identity)
    {
        $module = $this->getModuleByUuid($Identity);
        return $module->update();

    }

    public function deleteModuleByUuid(string $Identity)
    {
        $module = $this->getModuleByUuid($Identity);
        return $module->delete();
    }
}
