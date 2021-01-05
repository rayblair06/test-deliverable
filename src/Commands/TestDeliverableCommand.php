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
                            {--template : Note}
                            {--subject : Note}
                            {--line : Note}
                            {--factory : Note}';

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

        $template = $this->option('template');
        $factory = $this->option('factory');
        $subject = $this->option('subject') !== false ? $this->option('subject') : "Test " . strtoupper($service) . " Message";
        $line = $this->option('line') !== false ? $this->option('line') : "This is a text message to confirm the " . strtoupper($service) . " service works";

        Notification::route($service, $recipient)
            ->notify(new TestNotification($subject, $line)
        );

        $this->info("The deliverable " . strtoupper($service) . " test notification was sent");
    }
}
