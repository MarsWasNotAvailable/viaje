<?php 
    function CanEditArticles($UserRole) {
        switch (strtolower($UserRole))
        {
            case 'admin':
            case 'redactor':
                return true;
            // case 'moderator':
            // case 'guest':
            default:
                break;
        }
        return false;
    }

    function CanEditComments($UserRole) {
        switch (strtolower($UserRole))
        {
            case 'admin':
            case 'moderator':
                return true;
            // case 'guest':
            default:
                break;
        }
        return false;
    }
?>