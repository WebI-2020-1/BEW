<?php
    class LogoutController{
        public function logout(){
            session_destroy();

            return redirect('/login');
        }
    }
?>