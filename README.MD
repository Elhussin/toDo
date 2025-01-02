# User Management System

## Overview
This is a user management system built using **PHP**, **MySQL**, **Bootstrap**, and **CSS**. It includes features for user and admin functionalities, authentication, and task management. It is designed with security and usability in mind, incorporating techniques such as `.env` for sensitive data protection and a `config.php` file for configuration management.

---

## Features

### Authentication
- User registration and login/logout system.
- Email verification using PHP Mailer for account activation.
- Password reset functionality via email.

### User Features
- Update personal profile details.
- Manage tasks with a "To Do" system:
  - Add tasks.
  - Update task statuses: **Done**, **Waiting**, **Deleted**.

### Admin Features
- View, update, and delete user accounts.
- Activate or deactivate user accounts.
- Manage all user tasks and profiles.

### Security
- Sensitive data such as database credentials are managed using `.env` files to ensure protection.
- A `config.php` file is used to centralize configuration, making the system more secure and maintainable.

---

## Technologies Used

- **PHP**: Core server-side scripting.
- **MySQL**: Database management.
- **Bootstrap**: Responsive design and styling.
- **CSS**: Custom styling.
- **PHP Mailer**: For sending account activation and password reset emails.

---

## Installation

1. Clone the repository:
   ```bash
   git clone <repository-url>
   ```

2. Set up the database:
   - Import the `database.sql` file provided in the project.

3. Configure environment variables:
   - Create a `.env` file in the root directory.
   - Add the following environment variables:
     ```env
     DB_HOST=your_database_host
     DB_USER=your_database_user
     DB_PASS=your_database_password
     DB_NAME=your_database_name
     MAIL_HOST=your_email_host
     MAIL_USER=your_email_user
     MAIL_PASS=your_email_password
     ```

4. Configure `config.php`:
   - Ensure that `config.php` is set up to use the `.env` file for sensitive data.

5. Run the application:
   - Deploy on a local server using tools like XAMPP or WAMP.

---

## Usage

1. Access the system via the browser.
2. Register or log in as a user/admin.
3. Utilize the dashboard to:
   - Manage tasks.
   - Update profile information.
   - Admin-specific functionalities such as managing users and tasks.

---

## Future Enhancements

- Add role-based access control for more granular permissions.
- Implement a frontend framework like React or Vue.js for a more dynamic UI.
- Enhance security with features like two-factor authentication.

---

## Contributing
Contributions are welcome! Please fork the repository and submit a pull request with detailed information about your changes.

---

## License
This project is licensed under the MIT License. See the LICENSE file for details.

