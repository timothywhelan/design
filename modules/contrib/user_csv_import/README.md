CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Installation
 * Configuration
 * Structure of the CSV
 * Maintainers


INTRODUCTION
------------

This module imports user fields from a CSV file and creates a new user
account with the information contained in the file. In addition, it
let you select which fields will to import.

Most fields that comes with the Drupal core can be imported, with the
exception of "Image" and "Taxonomy term".

 * For a full description of the module, visit the [project page][1].
 * To submit bug reports and feature suggestions, or to track changes,
   use the [issue queue][2].
   

REQUIREMENTS
------------

This module requires no modules outside of Drupal core.


INSTALLATION
------------

Install as you would normally install a contributed Drupal
module. Visit [Installing modules][3] for further information.
   
After the module is installed, rebuild the cache.


CONFIGURATION
-------------

Once you have installed the module, a new button will appear on the
user administration page with the name "+ Import users from CSV".

By clicking on the button you will be redirected to a form where you
can upload the CSV file and configure the following options:

 * The role or set of roles that will be applied to the new users that
   are created. Authenticated user is mandatory.
 * The separation character (i.e. ";" if you're using a French version
   of MS Excel.
 * The default password.
 * The initial status of the imported users.
 * Whether to notify the new user by email.
 * The fields of the User entity that may be filled with the data
   extracted from the CSV file. The fields Name and Email will are
   mandatory.

There is also a checkbox named "Save configuration". Check it to save
the urrent settings when you click "Import users".  This saves you
from having to re-enter them the next time you import users.

Passwords can be set in different ways:

 1. You can set a **Default password** on the import form that will be
    applied to all imported users unless overridden.  You need to
    change this into something only you know, because *all* imported
    accounts will be set up with this password unless it is overridden
    in the CSV. Even if you notify the new user by mail, the account
    will have this password until the user changes it.

 2. If the user is notified by email, the default welcome email will
    send a one time log in url link. This would allow the new users to
    log in to set their own password. To examine the template for the
    welcome email that is send, navigate to **Administration »
    Configuration » People » Account settings** and look up: "Welcome
    (new user created by administrator)".

 3. You may checkmark the **Password** field and provide an unique
    cleartext password in the CSV for each user. It will be encrypted
    when saved in the database. Any unpopulated 'pass' field in the
    CSV-file will be set to the **Default password**.


STRUCTURE OF THE CSV
--------------------

In the first row, each column will contain the machine name of the
field where you want to store the value. In the following rows, but
following the same pattern of columns, the values will be stored.

Use the button "Generate sample CSV" to get a sample of how the first
line should be.


MAINTAINERS
-----------

 * [Gisle Hannemyr][4]
 * [Marc Fernandez][5]
 * [Ethan Aho][6]


[1]: https://www.drupal.org/project/user_csv_import
[2]: https://www.drupal.org/project/issues/user_csv_import
[3]: https://www.drupal.org/node/1897420
[4]: https://www.drupal.org/u/gisle
[5]: https://www.drupal.org/u/mcfdez87
[6]: https://www.drupal.org/u/eahonet
