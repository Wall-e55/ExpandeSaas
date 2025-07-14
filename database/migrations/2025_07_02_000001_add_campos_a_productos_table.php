<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->string('nombre')->after('id');
            $table->text('descripcion')->nullable()->after('nombre');
            $table->decimal('precio', 10, 2)->after('descripcion');
            $table->boolean('activo')->default(true)->after('precio');
        });
    }

    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn(['nombre', 'descripcion', 'precio', 'activo']);
        });
    }
};
