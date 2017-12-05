<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission {
  
  public static function defaultPermissions() {
    return [
      'viewUsers',
      'addUsers',
      'editUsers',
      'deleteUsers',

      'viewRoles',
      'addRoles',
      'editRoles',
      'deleteRoles',

      'viewPosts',
      'addPosts',
      'editPosts',
      'deletePosts',
    ];
  }
}
