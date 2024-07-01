<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->after('id', function (Blueprint $table) {
                $table->string('title');
                $table->foreignId('salary_id')->constrained()->onDelete('cascade');
                $table->foreignId('category_id')->constrained()->onDelete('cascade');
                $table->string('company');
                $table->date('last_date');
                $table->text('description');
                $table->string('image');
                $table->integer('published')->default(1);
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->dropForeign(['salary_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['user_id']);
            $table->dropColumn([
                'title',
                'salary_id',
                'category_id',
                'company',
                'last_date',
                'description',
                'image',
                'published',
                'user_id'
            ]);
        });
    }
};
