<?php

namespace Rayblair\TestDeliverable\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;
use Rayblair\TestDeliverable\Notifications\TestNotification;

class TestDeliverableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:deliverable
                            {service : Note}
                            {recipient : Note}
                            {--template= : Note}
                            {--factory= : Note}
                            {--subject= : Note}
                            {--line= : Note}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Deliverable';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $service = $this->argument('service');
        $recipient = $this->argument('recipient');

        $template = $this->option('template') !== false ? resource_path('view/' . $this->option('template')) : false;
        $factory = $this->option('factory') !== false ? factory($this->option('factory')) : false;
        $subject = $this->option('subject') !== false ? $this->option('subject') : "Test " . strtoupper($service) . " Message";
        $line = $this->option('line') !== false ? $this->option('line') : "This is a text message to confirm the " . strtoupper($service) . " service works";

        switch (true) {
            case $this->option('template') !== false && $this->option('factory') !== false:
                // Send a tempate with a factory injected in
                $this->line('TODO send template and factory notification');
                break;
            case $this->option('template') !== false:
                // Send a template
                $this->line('TODO send template notification');
                break;
            default:
                // Send Default Test Message
                Notification::route($service, $recipient)
                    ->notify(new TestNotification($subject, $line)
                );
                break;
        }

        $this->info("The deliverable " . strtoupper($service) . " test notification was sent");
    }
}
