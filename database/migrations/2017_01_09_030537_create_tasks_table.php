<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $connection = 'mongodb';

    public function up()
    {
        Schema::connection($this->connection)->table('tasks', function (Blueprint $collection) {
                $collection->index('_id');
                $collection->string('title');
                $collection->string('description');
                $collection->datetime('due_date');
                $collection->boolean('completed');
                $collection->timestamps();     
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
