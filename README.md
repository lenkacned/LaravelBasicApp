## About my app

This application includes basic Laravel user authentication and admin's CRUD functionality over images. 

## Application on start
</br>

**Database seeding:** </br>
>> php artisan migrate:fresh --seed </br>
</br>

**Log in as Admin with credentials:** </br>
email: admin@example.com</br>
password: admin</br>
</br>

**Log in as Member with credentials:** </br>
email: member@example.com</br>
password: member</br>
</br>

**Symlink created through Laravel sym links with** </br>
>> php artisan storage:link</br>
</br>

**Symlink:**
```diff
+ >> ./public/storage -> /mnt/d/Laravel_8/basic/storage/app/public
```
</br>

**Laravel links in filesystems.php:** </br>
<em>'links' => [public_path('storage') => storage_path('app/public')]<em> </br>


## Next

The Admin dashboard page is in progress and should include: </br>
<pre>
    1. creating an image as an instance of the Image class with specific parameters </br>
    2. saving it to the database,</br>
    3. list of all images,</br>
    4. edit and delete image objects</br>
</pre>

 
