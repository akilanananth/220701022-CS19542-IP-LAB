import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DatabaseConnection {
    public static Connection getConnection() {
        Connection connection = null;
        try {
            // Load the MySQL JDBC Driver
            Class.forName("com.mysql.cj.jdbc.Driver");

            // Set up the connection to the MySQL database
            connection = DriverManager.getConnection(
                "jdbc:mysql://localhost:3306/students",  // Database URL (replace "students" with your DB name)
                "root",                                  // Username (replace with your MySQL username)
                ""                          // Password (replace with your MySQL password)
            );
        } catch (ClassNotFoundException e) {
            System.out.println("MySQL Driver not found.");
            e.printStackTrace();
        } catch (SQLException e) {
            System.out.println("Failed to connect to the database.");
            e.printStackTrace();
        }
        return connection;
    }
}
