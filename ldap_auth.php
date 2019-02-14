<?php
//~ $domain = 'mydomain.com';
//~ $username = 'josue.ruiz';
//~ $password = 'pass';
//~ $ldapconfig['host'] = '10.10.10.11';
//~ $ldapconfig['port'] = 389;
//~ $ldapconfig['basedn'] = 'dc=domain,dc=com';

//~ $ds=ldap_connect($ldapconfig['host'], $ldapconfig['port']);
//~ ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
//~ ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);

//~ $dn="ou=Technology,".$ldapconfig['basedn'];
//~ $bind=ldap_bind($ds, $username .'@' .$domain, $password);
//~ $isITuser = ldap_search($bind,$dn,'(&(objectClass=User)(sAMAccountName=' . $username. '))');
//~ if ($isITuser) {
    //~ echo("Login correct");
//~ } else {
    //~ echo("Login incorrect");
//~ }
function ldap_authenticate($username, $userpassword) {
        if(empty($username) || empty($userpassword)) return false;
        $ldap_host = "161.202.21.8";
        $ldap_port = "389";
        $ldap_dn = "ou=groups,dc=simplecrmperformance,dc=com";   
        //$ldap_group = "Site Admins";
        $ldap_usr_dom = 'simplecrmperformance.com';
        $ldap = ldap_connect($ldap_host,$ldap_port);
        ldap_set_option($ldap,LDAP_OPT_PROTOCOL_VERSION,3);
        ldap_set_option($ldap,LDAP_OPT_REFERRALS,0);
        // validate username and password
        if($bind = ldap_bind($ldap, $username.'@' .$ldap_usr_dom, $userpassword)) {
                //$filter = "(sAMAccountName=".$username.")";
                //$attr = array("memberof");
                $result = ldap_search($ldap, $ldap_dn, '(&(objectClass=User)(sAMAccountName=' . $username. '))') or exit("LDAP lookup failed");
                if ($result) {
    echo("Login correct");
} else {
    echo("Login incorrect");
}
                //~ $entries = ldap_get_entries($ldap, $result);
                //~ ldap_unbind($ldap);
                // check group permission
                //~ foreach($entries[0]['memberof'] as $grps) {
                        //~ if(strpos($grps, $ldap_group)) { $access = 1; break; }
               //~ }

                //~ if($access != 0) {
                        //~ // session variables
                        //~ $_SESSION['user'] = $username;
                        //~ $_SESSION['access'] = $access;
                        //~ return true;
                //~ } else {
                        //~ // no access permission
                        //~ return false;
                //~ }

        } else {                return false;        }
}
?>
