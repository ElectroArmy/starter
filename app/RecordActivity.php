<?php namespace App;

use ReflectionClass;

trait RecordActivity
{
    /**
     * Register the event listeners.
     */
    protected static function bootRecordsActivity()
    {

        foreach (static::getModelEvents() as $event) {
            static::$event(function($model) use ($event) {
                $model->recordActivity($event);
            });
        }

    }

    /**
     * Record activity for the model.
     *
     * @param $event
     * @return void
     */
    public function recordActivity($event)
    {

        Activity::create([
            'subject_id' => $this->id,
            'subject_type' => get_class($this),
            'name' => $this->getActivityName($this, $event),
            'user_id' => $this->user_id
        ]);
    }

    /**
     * Prepare the activity name.
     *
     * @param $model
     * @param $action
     * @return string
     */
    protected function getActivityName($model, $action)
    {
        $name = strtolower((new ReflectionClass($model))->getShortName());

        return "{$action}_{$name}";
    }


    /**
     * Get the model events to record activity for.
     * @return mixed
     */
    protected static function getModelEvents()
    {
        if (isset(static::$recordEvents)) {
            return static::$recordEvents;
        }

        return [
            'created', 'deleted', 'updated'
        ];
    }
}