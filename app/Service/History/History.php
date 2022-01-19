<?php

namespace App\Service\History;

use App\Models\Task;
use App\Service\History\Models\HistoryTask;
use Illuminate\Support\Facades\DB;

class History
{
    public function save(Task $entity)
    {
        $attributes = $entity->getDirty();

        if ($attributes) {
            foreach ($attributes as $key => $attribute) {
                HistoryTask::insert(
                    [
                        'task_id' => $entity->task_id,
                        'key' => $key,
                        'value' => $entity->getOriginal($key),
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                );
            }
        }
    }
}
