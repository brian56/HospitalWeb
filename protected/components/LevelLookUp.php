<?php 
class LevelLookUp{
      const USER = 1;
      const MANAGER = 2;
      const ADMIN  = 3;
      // For CGridView, CListView Purposes
      public static function getLabel( $level ){
          if($level == self::USER)
             return 'User';
          if($level == self::MANAGER)
             return 'Manager';
          if($level == self::ADMIN)
             return 'Administrator';
          return false;
      }
      // for dropdown lists purposes
      public static function getLevelList(){
          return array(
                 self::USER=>'User',
                 self::MANAGER=>'Manager',
                 self::ADMIN=>'Administrator');
    }
}
?>