This project is a blog application developed using PHP and MySQL. It includes an admin panel for managing blog posts, categories, and users. 

# Registration
Users can input details such as first name, last name, email address, and password to complete the registration. Once user information is submitted through the form, it is securely stored in a MySQL database. After successful registration, users can log in to the site.

![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/783c5884-3193-4665-9f04-3f4a9855a745)


# User Information (Users Table)
Each user is assigned a unique user ID (user_id), and every new registration adds a new row to the table. User information is securely managed on the backend of our web application using PHP and MySQL. 

![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/767e33fd-71ec-4ffe-acf8-1e858590c98b)


# Login 
Below is a screenshot of our web application's login screen. Users can access their accounts through this interface. The login screen allows users to authenticate themselves by entering their username and password.

![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/b002e8b9-fc28-4db3-b52a-3e9ea78f38a9)


# Admin Panel - Dashboard 

The dashboard screen provides access to various management options, allowing users to oversee different areas of the application. 

**Add Post:** Create and publish new content.
**Manage Posts:** Edit existing posts, perform deletion operations.
**Add User:** Add new users and manage account settings.
**Manage Users:** Edit permissions of existing users, perform actions on accounts.
**Add Category:** Create new categories and categorize your posts.
**Manage Categories:** Edit existing categories, perform deletion operations.

![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/51d77f09-74ff-401b-9362-db34cf7ca93d)


# Adding a Post
**Enter Title:** Enter a suitable title for your post. The title should summarize the main theme or content of your post.
**Select Category:** Assign your post to an appropriate category. Categories help organize content and facilitate easy searching for visitors.
**Write Content:** Write the details of your post in the "Text" field. Here, express the descriptions, details, or content of your post in detail.
**Add Image (Optional):** If you wish to add visual content, upload the image file using the "Add Image" option and include it in your post.
**Publish or Save Post:** After preparing your post, click the "Add Post" button to complete the process.

![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/f7e75209-ca00-4d95-bfc8-5b80946a2817)


# Managing Posts
**Editing a Post:** Click on the "Edit" button next to the respective post to edit it. Here, you can update the title, content, or category of the post.
**Deleting a Post:** To permanently delete a post, click on the "Delete" button next to the respective post. This action removes the post completely from the database.
**Saving Changes:** After editing or deleting a post, click the "Save Changes" button at the bottom of the page to save your modifications. 

![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/771cc33d-ee51-4b59-a78c-61ca089b7914)


# Posts Database Table
This table contains titles and descriptions of categories defined within the application. Each category added or edited by our users is stored in this table and dynamically utilized by the application.

![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/4df3b820-82d1-4df3-8ada-3dc880a637c2)


# Adding Users
To add a new user, after logging into the admin panel, select "Add User" from the menu on the left side. This will bring up a user addition form with the following fields:

![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/c397384d-743c-46b2-b91c-5baf1fff20e5)


#  Managing Users
This section displays a list of current users. Typically, the user management screen allows you to perform the following actions:

**Edit User:** When you select a user from the list, a form opens where you can edit the user's information. You can update details such as username, first name, last name, and user role (e.g., author or admin). Click the "Edit User" button to save any changes.

**Delete User:** To remove a user from the list, click the "Delete" button next to their entry. Deleting a user permanently removes their information from the database.

![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/8c9824d1-7426-49ae-ba71-ca2ae0aba176)


# Adding Categories
Within the admin panel, there is an option called "Add Category" to organize content more effectively and accessibly. This section allows you to create new categories and assign content to them.

![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/69320474-2b31-4014-8f7b-de40c8728c0e)


#  Managing Categories
The "Manage Categories" section in the admin panel facilitates the editing and deletion of existing categories. In this section, you can update the titles and descriptions of previously added categories or remove unnecessary categories. 

![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/150aa3ea-1988-49e5-85e4-4a09d9a540e9)


# Categories Database Table
The categories management database table used in my web application developed with PHP and MySQL. This table stores titles and descriptions of categories defined within the application. Each category added or modified by our users is recorded in this table and dynamically utilized by the application.

![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/10195994-5a59-4055-ab40-cf6e5cf15a06)


# Homepage 
This section displays a screenshot of the homepage of our web application. The image showcases published posts and author information. Posts are fetched from the posts table, where each post's title, date, category, and author are listed. Author details are retrieved from the users table. This design aims to facilitate easy access to posts and seamless navigation between contents.

Post titles and dates
Post categories and author information

![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/fb0229d2-9c4c-450e-8fd7-cbc5ee32c99b)


#  Post Detail

![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/b2d47a1d-6649-4966-96d2-9a82be1c9a24)


# Search 
The search functionality allows users to find relevant posts on the website by entering specific keywords or phrases. Search results list posts that match the text entered by the user in their titles or content. This functionality is crucial for enhancing user experience and facilitating access to content.

For example, when a user searches for "Github," all posts containing this keyword within their titles or content are displayed. Each result is presented with its title, summary, and author information, directing users to the relevant content directly.

![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/a9dc2a11-0b1e-4265-a69f-12933762e822)


# Posts by Category
I have implemented functionality on my blog to retrieve posts based on categories. Users can view posts belonging to a specific category when they click on any category title on the blog page.

When a user clicks on a category title, a PHP code is used to retrieve posts related to that category using URL parameters. For example, when a user clicks on the "Digital Forensics" category, a parameter is passed in the URL like category-posts.php?id=7.

![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/bbc7586d-4fcb-4712-8431-ae7e0145449b)


**Warning: No posts found for this category**

![image](https://github.com/kurumsena/PHP-MySQL-Blog-App-with-Admin-Panel-/assets/132753845/b19738bf-2647-437e-9340-da01fa60adf5)


















