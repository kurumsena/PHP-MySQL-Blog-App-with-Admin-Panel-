This project is a blog application developed using PHP and MySQL. It includes an admin panel for managing blog posts, categories, and users. 

# Registration
Users can input details such as first name, last name, email address, and password to complete the registration. Once user information is submitted through the form, it is securely stored in a MySQL database. After successful registration, users can log in to the site.
![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/171b08e7-bdc3-4161-89a0-52f0157ec96b)

# User Information (Users Table)
Each user is assigned a unique user ID (user_id), and every new registration adds a new row to the table. User information is securely managed on the backend of our web application using PHP and MySQL. 
![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/d6e7421c-99ba-4042-bfeb-c498eb8b7ada)

# Login 
Below is a screenshot of our web application's login screen. Users can access their accounts through this interface. The login screen allows users to authenticate themselves by entering their username and password.
![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/c421a2a5-4ba7-4644-be7a-7bdc935e8aa1)


# Admin Panel - Dashboard 

The dashboard screen provides access to various management options, allowing users to oversee different areas of the application. 

**Add Post:** Create and publish new content.
**Manage Posts:** Edit existing posts, perform deletion operations.
**Add User:** Add new users and manage account settings.
**Manage Users:** Edit permissions of existing users, perform actions on accounts.
**Add Category:** Create new categories and categorize your posts.
**Manage Categories:** Edit existing categories, perform deletion operations.
![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/2bb2f223-4f23-49a2-a93c-cbda3ef21ec8)

# Adding a Post
**Enter Title:** Enter a suitable title for your post. The title should summarize the main theme or content of your post.
**Select Category:** Assign your post to an appropriate category. Categories help organize content and facilitate easy searching for visitors.
**Write Content:** Write the details of your post in the "Text" field. Here, express the descriptions, details, or content of your post in detail.
**Add Image (Optional):** If you wish to add visual content, upload the image file using the "Add Image" option and include it in your post.
**Publish or Save Post:** After preparing your post, click the "Add Post" button to complete the process.
![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/c2e2b343-4b58-4db5-99b2-8ac9ad544ddc)

# Managing Posts
**Editing a Post:** Click on the "Edit" button next to the respective post to edit it. Here, you can update the title, content, or category of the post.
**Deleting a Post:** To permanently delete a post, click on the "Delete" button next to the respective post. This action removes the post completely from the database.
**Saving Changes:** After editing or deleting a post, click the "Save Changes" button at the bottom of the page to save your modifications. 
![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/f5d8e519-e882-4e0e-83e7-e9fb5529e3a9)
![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/da3958d9-5f79-46c5-be1a-440aecfca00e)

# Posts Database Table
This table contains titles and descriptions of categories defined within the application. Each category added or edited by our users is stored in this table and dynamically utilized by the application.
![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/c26a95c1-d9c1-4cb8-8c11-1f7d0e9a8d57)

# Adding Users
To add a new user, after logging into the admin panel, select "Add User" from the menu on the left side. This will bring up a user addition form with the following fields:
![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/33587eae-b9bf-4244-8b27-909af6c978de)

#  Managing Users
This section displays a list of current users. Typically, the user management screen allows you to perform the following actions:

**Edit User:** When you select a user from the list, a form opens where you can edit the user's information. You can update details such as username, first name, last name, and user role (e.g., author or admin). Click the "Edit User" button to save any changes.

**Delete User:** To remove a user from the list, click the "Delete" button next to their entry. Deleting a user permanently removes their information from the database.
![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/65859dba-d63c-4124-a3a5-80fa9aaea74f)

# Adding Categories
Within the admin panel, there is an option called "Add Category" to organize content more effectively and accessibly. This section allows you to create new categories and assign content to them.
![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/6ccde85b-bbe6-4b31-a635-8c6f533cf408)

#  Managing Categories
The "Manage Categories" section in the admin panel facilitates the editing and deletion of existing categories. In this section, you can update the titles and descriptions of previously added categories or remove unnecessary categories. 
![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/b5e06c4d-1da5-4126-aa1e-c8c602439d92)

# Categories Database Table
The categories management database table used in my web application developed with PHP and MySQL. This table stores titles and descriptions of categories defined within the application. Each category added or modified by our users is recorded in this table and dynamically utilized by the application.
![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/aabc022a-ef34-40b5-9c9c-4a8e2907a204)

# Homepage 
This section displays a screenshot of the homepage of our web application. The image showcases published posts and author information. Posts are fetched from the posts table, where each post's title, date, category, and author are listed. Author details are retrieved from the users table. This design aims to facilitate easy access to posts and seamless navigation between contents.

Post titles and dates
Post categories and author information
![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/51c3198f-5052-427b-a3e1-22a0204ebb37)

#  Post Detail
![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/28b81cca-3c9e-4134-a3c3-e3202d7208b1)

# Search 
The search functionality allows users to find relevant posts on the website by entering specific keywords or phrases. Search results list posts that match the text entered by the user in their titles or content. This functionality is crucial for enhancing user experience and facilitating access to content.

For example, when a user searches for "Github," all posts containing this keyword within their titles or content are displayed. Each result is presented with its title, summary, and author information, directing users to the relevant content directly.
![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/6d4d1627-d5a3-40b3-a5d1-2ec7635678f4)

# Posts by Category
I have implemented functionality on my blog to retrieve posts based on categories. Users can view posts belonging to a specific category when they click on any category title on the blog page.

When a user clicks on a category title, a PHP code is used to retrieve posts related to that category using URL parameters. For example, when a user clicks on the "Digital Forensics" category, a parameter is passed in the URL like category-posts.php?id=7.
![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/f9aa1584-8f96-4c6a-abfc-d843f9d698d5)

**Warning: No posts found for this category**
![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/613d1fad-4254-4ff2-a314-8e16daa26f5d)

















