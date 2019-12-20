<?php

namespace MaxGaurav\LaravelSnsSqsQueue;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use MaxGaurav\LaravelSnsSqsQueue\Exceptions\NoJobMapped;

class DefaultJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    public $topic;

    /**
     * @var array
     */
    public $message;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $topic, array $message)
    {
        $this->topic = $topic;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws
     */
    public function handle()
    {
        throw new NoJobMapped($this->topic);
    }
}
