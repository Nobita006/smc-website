// in home.js
// Fetch Weather Data (OpenWeatherMap API)
async function fetchWeather() {
    const apiKey = '15f8d887d3d1476f573db502295a47ae';   // Replace with your API key from OpenWeatherMap API

// Fetch Daily Quote (API Ninjas)
async function fetchQuote() {
    const apiKey = '/RadM/mLFGB7/cc85mj+oQ==pMfQPHvH2qTPqHUg';  // Replace with your API key from API Ninjas

// in login.php

date_default_timezone_set('Asia/Kolkata');

---

### **HTML Files:**

1. **`home.html`**:
   - **Purpose**: This is the main landing page of the SMC website. It introduces visitors to the social media safety campaign, providing a welcoming interface with relevant images and introductory text. The page also includes links to other sections of the website, making it easy for users to navigate through the available resources.
   - **Key Features**: Includes interactive navigation, responsive images, and links to integrated web services like the weather and quotes services.

2. **`information.html`**:
   - **Purpose**: This page provides detailed information about the goals and objectives of the social media campaigns. It educates users, particularly teenagers, on the importance of safe online behavior and the various strategies SMC uses to promote safety.
   - **Key Features**: Structured content that aligns with the campaign’s educational mission, including headers, paragraphs, and links to additional resources.

3. **`apps.html`**:
   - **Purpose**: This page lists the most popular social media apps and provides tips on how to use them safely. Users can learn about the risks associated with these platforms and how to mitigate them.
   - **Key Features**: A searchable list of apps (planned for future implementation) and safety tips related to each app.

4. **`parents.html`**:
   - **Purpose**: This page offers guidance to parents on how they can help their teenagers navigate social media safely. It provides practical tips and advice aimed at fostering healthy social media habits.
   - **Key Features**: Content tailored for parents, including tips, resources, and links to external articles or tools.

5. **`livestreaming.html`**:
   - **Purpose**: This page explains the concept of livestreaming and the potential dangers it poses to teenagers. It educates users on how to engage in livestreaming activities safely.
   - **Key Features**: Detailed descriptions of safe practices, risks, and precautions to take while livestreaming.

6. **`contact.html`**:
   - **Purpose**: This page includes a contact form that allows users to send messages directly to the SMC team. It’s a vital tool for user interaction, enabling users to ask questions, provide feedback, or request further information.
   - **Key Features**: A form with fields for name, email, and message, linked to the `contact.php` script for backend processing.

7. **`legislation.html`**:
   - **Purpose**: This page provides information on relevant legislation and guidelines related to online social media use. It serves as a resource for users looking to understand the legal aspects of social media safety.
   - **Key Features**: Detailed legislative information with references to laws and best practices.

8. **`login.html`**:
   - **Purpose**: This is the login page where registered users can enter their credentials to access member-only areas of the website. 
   - **Key Features**: A form that captures the user's email and password, linked to the `login.php` script for authentication.

9. **`register.html`**:
   - **Purpose**: This page allows new users to register for the website by creating an account. It collects essential user information and stores it in the database.
   - **Key Features**: A registration form that collects email, password, and other necessary details, linked to the `register.php` script.

10. **`privacy-policy.html`**:
    - **Purpose**: This page outlines the privacy policy of the SMC website, informing users about how their data will be used and protected.
    - **Key Features**: Legal and policy information relevant to user data protection.

### **CSS Files:**

1. **`styles.css`**:
   - **Purpose**: This is the main stylesheet for the SMC website. It defines the visual appearance of the website, including colors, fonts, layout, and responsiveness. The use of an external CSS file ensures consistency across all pages and allows for easy updates.
   - **Key Features**: Custom cursors, responsive design for different devices, and consistent styling across all HTML elements.

2. **Images in `css/images/`**:
   - **Purpose**: These are images used in the website’s design, including custom cursor icons and a background image.
   - **Key Features**: Includes `custom-cursor.png`, `custom-hand-cursor.png`, and `social_media.jpg`, which are used to enhance the visual experience on the site.

### **JavaScript Files:**

1. **`home.js`**:
   - **Purpose**: This script adds interactivity to the home page, managing dynamic content and user interactions.
   - **Key Features**: Handles actions such as content toggling, animations, or other dynamic behaviors on the home page.

2. **`tips.js`**:
   - **Purpose**: This script manages tips and advice content on pages like `parents.html` and `apps.html`.
   - **Key Features**: Provides interactivity, such as revealing or hiding tips based on user actions.

3. **`toggle.js`**:
   - **Purpose**: This script controls the behavior of toggle elements, such as dropdowns in the navigation bar.
   - **Key Features**: Ensures smooth and responsive navigation across different sections of the website.

### **PHP Files:**

1. **`config.php`**:
   - **Purpose**: This file contains the database connection settings. It centralizes the database configuration, making it easier to manage and secure the connection details.
   - **Key Features**: Defines the connection to the MySQL database, including the host, username, password, and database name.

2. **`login.php`**:
   - **Purpose**: This script handles user authentication by verifying the login credentials entered on the `login.html` page. It manages sessions, checks for login attempts, and enforces security measures such as account lockout after multiple failed attempts.
   - **Key Features**: Password verification, session initiation, login attempts tracking, and account lockout functionality.

3. **`logout.php`**:
   - **Purpose**: This script logs the user out of their session, effectively ending their authenticated session on the website.
   - **Key Features**: Destroys the session and redirects the user to the login page.

4. **`register.php`**:
   - **Purpose**: This script processes the registration form data from `register.html`. It validates the input, hashes the password, and stores the new user information in the database.
   - **Key Features**: Input validation, password hashing, and secure database insertion.

5. **`contact.php`**:
   - **Purpose**: This script processes the contact form submissions. It sends the user's message to the SMC team, typically via email or by storing it in the database.
   - **Key Features**: Handles form submissions, input sanitization, and email functionality (if implemented).

6. **`tips.php`**:
   - **Purpose**: This script could be used to dynamically fetch or manage tips related content, although it appears to be a placeholder or not fully implemented yet.
   - **Key Features**: Potentially handles database queries for displaying tips or advice based on user interaction.

### **Database File:**

1. **`smc_db.sql`**:
   - **Purpose**: This SQL file defines the structure of the SMC website’s database. It includes tables for storing user information, such as email addresses, hashed passwords, login attempts, and other necessary details.
   - **Key Features**: Table creation scripts, indices for optimizing queries, and initial data insertion for testing or configuration purposes.

### **Summary**
The SMC website is a comprehensive platform designed to educate and support teenagers in using social media safely. Each file in the project plays a specific role, contributing to the overall functionality and user experience. The HTML, CSS, and JavaScript files work together to create a responsive and interactive front end, while the PHP scripts manage backend processes such as user authentication, form handling, and database interactions. The database structure is well-planned, ensuring that user data is securely stored and efficiently managed. 

---
