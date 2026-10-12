# Pet Adoption Website

A web-based pet adoption platform developed using PHP and MySQL. The application allows users to explore available pets, submit adoption requests, manage their accounts, make donations, and contact the website team.

## Features

* **Home Page:** Introduces the platform and its purpose.
* **Pet Listings:** Displays pets available for adoption.
* **Adoption Requests:** Allows users to submit adoption applications.
* **User Authentication:** Provides login and registration functionality.
* **User Profile:** Allows registered users to access their profile.
* **Donation Page:** Provides an interface for donations.
* **Contact Page:** Enables users to contact the website team.
* **Database Integration:** Uses MySQL to store and manage application data.
* **Responsive Interface:** Provides a layout designed for different screen sizes.

## Technologies Used

| Technology | Purpose                       |
| ---------- | ----------------------------- |
| HTML       | Page structure                |
| CSS        | Styling and layout            |
| PHP        | Server-side application logic |
| MySQL      | Database management           |
| XAMPP      | Local development environment |
| Apache     | Local web server              |

## Getting Started

### Prerequisites

Install the following software:

* XAMPP
* A web browser

### Installation and Setup

**1. Clone the repository**

```bash
git clone YOUR_REPOSITORY_URL
```

Replace `YOUR_REPOSITORY_URL` with the URL of your GitHub repository.

**2. Move the project**

Copy the project folder into the XAMPP `htdocs` directory.

For example:

```text
C:/xampp/htdocs/project-folder/
```

**3. Start XAMPP**

Open the XAMPP Control Panel and start:

* Apache
* MySQL

**4. Import the database**

1. Open `http://localhost/phpmyadmin`.
2. Create a database or select the database required by the project.
3. Import the provided SQL file through the Import tab.
4. Update the database connection settings in the PHP configuration if necessary.

**5. Run the application**

Open the following address in your browser:

```text
http://localhost/project-folder/
```

Replace `project-folder` with the actual name of your project directory.

## Project Objectives

* Develop a dynamic website using PHP and MySQL.
* Implement user registration and login functionality.
* Manage pet listings and adoption requests.
* Practise server-side development and database integration.
* Build a user-friendly interface for a practical application.

## Future Enhancements

* Adoption request status tracking.
* Administrative dashboard for managing pets and requests.
* Improved form validation and security.
* Email notifications for adoption requests.
* Enhanced accessibility and responsive design.

## License

This project is licensed under the MIT License. See the `LICENSE` file for details, if included in the repository.
