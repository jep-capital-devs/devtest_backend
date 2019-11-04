<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTables extends Migration
{
    protected $useBigIncrements;

    public function __construct()
    {
        $this->useBigIncrements = app()::VERSION >= 5.8;
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ($this->useBigIncrements) {
            Schema::create('groups', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('description')->nullable();
                $table->string('short_description')->nullable();
                $table->string('image')->nullable();
                $table->string('url')->nullable();
                $table->integer('user_id')->unsignedBigIntegers();
                $table->boolean('private')->unsigned()->default(false);
                $table->integer('conversation_id')->unsignedBigIntegers()->nullable();
                $table->text('extra_info')->nullable();
                $table->text('settings')->nullable();
                $table->timestamps();
            });

            Schema::create('group_user', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('user_id')->unsignedBigIntegers();
                $table->integer('group_id')->unsignedBigIntegers();
                $table->timestamps();
            });

            Schema::create('posts', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('title');
                $table->text('body');
                $table->string('type');
                $table->integer('user_id')->unsignedBigIntegers();
                $table->text('extra_info')->nullable();
                $table->timestamps();
            });

            Schema::create('comments', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('body');
                $table->integer('user_id')->unsignedBigIntegers();
                $table->integer('post_id')->unsignedBigIntegers();
                $table->string('type')->nullable();
                $table->timestamps();
            });

            Schema::create('group_post', function (Blueprint $table) {
                $table->integer('group_id')->unsignedBigIntegers();
                $table->integer('post_id')->unsignedBigIntegers();
                $table->timestamps();
            });

            Schema::create('likes', function (Blueprint $table) {
                $table->integer('user_id')->index();
                $table->integer('likeable_id')->unsignedBigIntegers();
                $table->string('likeable_type');
                $table->primary(['user_id', 'likeable_id', 'likeable_type']);
                $table->timestamps();
            });

            Schema::create('reports', function (Blueprint $table) {
                $table->integer('user_id')->index();
                $table->integer('reportable_id')->unsignedBigIntegers();
                $table->string('reportable_type');
                $table->primary(['user_id', 'reportable_id', 'reportable_type']);
                $table->timestamps();
            });

            Schema::create('group_request', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('user_id')->unsignedBigIntegers()->index();
                $table->integer('group_id')->unsignedBigIntegers()->index();
                $table->timestamps();
            });
        } else {
            Schema::create('groups', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('description')->nullable();
                $table->string('short_description')->nullable();
                $table->string('image')->nullable();
                $table->string('url')->nullable();
                $table->integer('user_id')->unsigned();
                $table->boolean('private')->unsigned()->default(false);
                $table->integer('conversation_id')->unsigned()->nullable();
                $table->text('extra_info')->nullable();
                $table->text('settings')->nullable();
                $table->timestamps();
            });

            Schema::create('group_user', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned();
                $table->integer('group_id')->unsigned();
                $table->timestamps();
            });

            Schema::create('posts', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->text('body');
                $table->string('type');
                $table->integer('user_id')->unsigned();
                $table->text('extra_info')->nullable();
                $table->timestamps();
            });

            Schema::create('comments', function (Blueprint $table) {
                $table->increments('id');
                $table->string('body');
                $table->integer('user_id')->unsigned();
                $table->integer('post_id')->unsigned();
                $table->string('type')->nullable();
                $table->timestamps();
            });

            Schema::create('group_post', function (Blueprint $table) {
                $table->integer('group_id')->unsigned();
                $table->integer('post_id')->unsigned();
                $table->timestamps();
            });

            Schema::create('likes', function (Blueprint $table) {
                $table->integer('user_id')->index();
                $table->integer('likeable_id')->unsigned();
                $table->string('likeable_type');
                $table->primary(['user_id', 'likeable_id', 'likeable_type']);
                $table->timestamps();
            });

            Schema::create('reports', function (Blueprint $table) {
                $table->integer('user_id')->index();
                $table->integer('reportable_id')->unsigned();
                $table->string('reportable_type');
                $table->primary(['user_id', 'reportable_id', 'reportable_type']);
                $table->timestamps();
            });

            Schema::create('group_request', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned()->index();
                $table->integer('group_id')->unsigned()->index();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('groups');
        Schema::drop('group_user');
        Schema::drop('posts');
        Schema::drop('comments');
        Schema::drop('group_post');
        Schema::drop('likes');
        Schema::drop('reports');
        Schema::drop('group_request');
    }
}
