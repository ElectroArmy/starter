<?php

    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreatePostsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('posts', function(Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned()->index();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->string('title');
                $table->text('body');
                $table->binary('feat_image');
                $table->string('slug')->unique()->nullable();
                $table->timestamps();
                $table->timestamp('published_at')->nullable();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            Schema::drop('posts');
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }

