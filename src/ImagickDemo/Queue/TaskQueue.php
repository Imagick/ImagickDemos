<?php


namespace ImagickDemo\Queue;

// http://www.sitepoint.com/message-queues-comparing-beanstalkd-ironmq-amazon-sqs/

/*

Glossary

When working with queues you may come across these terms:

Bury (a job) – puts a job in a failed state. The job cannot be reprocessed until it is manually kicked back into the queue. Not supported by IronMQ and SQS.

Consumer – see Worker.

Delay – defer a job from being sent to a worker for a predetermined amount of time.

Delete (a job) – see Dequeue.

Dequeue – marks a job as completed and removes it from the queue.

Enqueue – adds a job to a queue ready for a worker.

FIFO – describes the way jobs are handled in a queue as First In, First Out. This is the most common type of message queue.

FILO – describes the way jobs are handled in a queue as First In, Last Out.

Job – a deferred task in a queue containing metadata to identify what task is waiting to be processed. Akin to database rows.

Kick (a job) – returns a previously buried job to the queue ready for workers to pick up. Not supported by IronMQ and SQS.

Provider – a client which connects to the message server to create jobs.

Queue – a way to group similar jobs into a queue. Akin to database tables.

Reserve (a job) – delivers a job to a worker and locks it from being delivered to another worker.

Worker – a client which connects to the message server to reserve, delete and bury jobs. These perform the labour intensive part of the processing.

*/

interface TaskQueue
{
    const STATE_INITIAL = 'initial';
    const STATE_WORKING = 'working';
    const STATE_COMPLETE = 'completed';
    const STATE_BURIED = 'buried';
    const STATE_ERROR = 'error';
    
    /**
     * Returns
     * @return Task
     */
    public function waitToAssignTask();

    /**
     * Add a task to the queue.
     * @param Task $task
     */
    public function addTask(Task $task);

    /**
     * Mark that a task is not to be processed.
     * @param Task $task
     * @return mixed
     */
    public function buryTask(Task $task);

    /**
     * Mark that a task has been completed.
     * @param Task $task
     * @return mixed
     */
    public function completeTask(Task $task);

    /**
     * Mark that a task has errored.
     * @param Task $task
     * @return mixed
     */
    public function errorTask(Task $task);
    
    /**
     * @return mixed
     */
    public function getName();

    /**
     * @return mixed
     */
    public function getQueueCount();

    /**
     * Returns true if the queue processor has run in the last
     * 30 seconds.
     * @return mixed
     */
    public function isActive();
}
