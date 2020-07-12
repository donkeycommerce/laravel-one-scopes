<?php

use DanieleTulone\Support\Files\Models;
use DanieleTulone\OneScopes\Models\Scope;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ScopesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function run(): void
    {
        $this->seedCrudScopes();

        $this->seedScopes();
    }

    /**
     * Create the scopes for crud actions.
     *
     * @return void
     */
    private function seedCrudScopes(): void
    {
        $models = Models::all();

        $models = array_map(function ($item) {
            return strtolower(str_replace('.php', '', $item));
        }, $models);

        $crossedScopes = Arr::crossJoin(
            Scope::$crudActions,
            array_merge($models, Scope::$resources)
        );

        foreach ($crossedScopes as $crossedScope) {
            $scopeName = implode('-', $crossedScope);

            Scope::create([
                'name' => $scopeName,
                'description' => "Allow to $crossedScope[0] a " . Str::singular($crossedScope[1])
            ]);
        }
    }

    /**
     * Seed the setted scopes.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    private function seedScopes(): void
    {
        foreach (Scope::$scopes as $key => $value) {
            Scope::create([
                'name' => $key,
                'description' => $value
            ]);
        }
    }
}
