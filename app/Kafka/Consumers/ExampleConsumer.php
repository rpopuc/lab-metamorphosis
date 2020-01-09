<?php
namespace App\Kafka\Consumers;

use Metamorphosis\Record\RecordInterface;
use Illuminate\Support\Facades\Log;
use Metamorphosis\TopicHandler\Consumer\AbstractHandler;

class ExampleConsumer extends AbstractHandler
{
    /**
     * Create a new consumer topic handler instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle record.
     *
     * @param RecordInterface $record
     */
    public function handle(RecordInterface $record): void
    {
        Log::info("Consuming a Kafka Message!");
    }
}
