<?php

namespace Tests\Feature;

use App\Models\MenuGroup;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class categoriesTest extends TestCase
{
    use RefreshDatabase;

    public function setup(): void
    {
        # code...
        parent::setUp();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_superadmin_read_menu_group()
    {
        //login superadmin
        $this->actingAs(User::find(1));

        //buka halaman menu item
        $response = $this->get('/menu-management/menu-group');

        //pastikan response 200
        $response->assertStatus(200);

        //assert ada variabel menu item
        $response->assertSeeText('Menu Group');
    }
    public function test_menu_group_update()
    {
        $menuItems = MenuGroup::where('id', 3)->update([
            'name' => 'Super Admin',
            'icon' => 'fas fa-bars',
            'permission_name' => 'menu.management',
        ]);

        $this->assertDatabaseMissing(
            'menu_groups',
            [
            'name' => 'Super Admin',
            'icon' => 'fas fa-bars',
            'permission_name' => 'menu.management',
            ]
        );
    }
    public function test_menu_group_delete(){
        $menuItems = MenuGroup::first();
        if ($menuItems) {
            $menuItems->delete();
        }
        $this->assertTrue(true);
    }
}
