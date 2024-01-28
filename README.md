# Hospital Management System

The Hospital Management System is a PHP-based web application designed to facilitate the management of medical personnel accounts within a hospital. It allows for the administration of accounts for doctors, with functionalities for both hospital administrators and clients to create accounts, schedule appointments with doctors of different specialties, and make online payments.

## Features

- **User Roles**: The system supports different user roles, including administrators, hospital directors, and clients/patients.
- **Account Management**: Hospital administrators and directors can manage accounts for medical personnel, including adding new doctors, updating their information, and deactivating accounts if needed.
- **Appointment Scheduling**: Clients can schedule appointments with doctors of various specialties through the system. Doctors can view their appointment schedules and manage them accordingly.
- **Specialty Selection**: Clients can choose doctors based on their specialties, ensuring that they schedule appointments with the appropriate medical professionals.
- **Online Payment**: The system supports online payment for appointments, allowing clients to pay for their consultations securely.
- **Notification System**: Clients receive notifications for appointment confirmations, reminders, and updates via email or SMS.

## Installation

To set up the Hospital Management System locally, follow these steps:
1. Clone the repository to your local machine.
2. Configure your server environment (e.g., Apache, MySQL, PHP).
3. Import the database schema provided in the `database.sql` file.
4. Update the database connection settings in `config.php` with your local database credentials.
5. Start your server environment.
6. Visit the website in your browser.

## Usage

Once the system is set up, users can perform the following actions:
- **Administrators**:
  - Manage accounts for doctors.
  - View and manage appointment schedules.
- **Hospital Directors**:
  - Oversee hospital operations.
  - Monitor appointment bookings and payments.
- **Clients/Patients**:
  - Create accounts.
  - Schedule appointments with doctors.
  - Make online payments.

## Examples

1. **Client Registration**:
   - Clients can register on the system by providing their personal information and creating an account.
2. **Appointment Booking**:
   - After registration, clients can browse available doctors, select a preferred specialty, and schedule appointments based on doctor availability.
3. **Online Payment**:
   - Once appointments are confirmed, clients can make online payments securely through the system.
4. **Account Management**:
   - Administrators and directors can manage accounts for doctors, update their information, and view appointment schedules.

## Contributions

Contributions to this project are welcome! If you'd like to contribute, please fork the repository, make your changes, and submit a pull request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact

If you have any questions or suggestions regarding this project, feel free to contact the project maintainers at [email@example.com](mailto:email@example.com).

## Screenshots

![Screenshot 1](screenshots/screenshot1.png)
![Screenshot 2](screenshots/screenshot2.png)

## Dependencies

This project relies on the following dependencies:
- PHP 7.0+
- MySQL 5.7+
- Apache 2.4+
