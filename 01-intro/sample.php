<?php>
# Unclean code
function check($scp, $id) {
    if(Auth::user() -> hasRole('admin')) {
        return true;
    }
    else {
        switch($scp) {
            case 'public':
                return true;
                break;
            case 'private':
                if(Auth::user() == $id) 
                    return true;
                break;
            default:
                return false;
        }
    }
    return false;
}


# Clean code
#  1. Full name of param, no abbr
#  2. Function name: explicit and clear purpose
#  3. Layered logic structure, using early return style
#     a) Firs check the most widely 'public' scope
#     b) Then check the most previlidged role 'admin'
#     c) Lastly, in 'private' scope, only owner 'canView'
function canView($scope, $owner_id) {
    if($scope == 'public') {
        return true;
    }
    
    if(Auth::user() -> hasRole('admin')) {
        return true;
    }

    if($scope == 'private' && Auth::user()->id == $owner_id) {
        return true;
    }

    return false;
}

</php>

