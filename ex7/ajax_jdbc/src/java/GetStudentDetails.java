import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/GetStudentDetails")
public class GetStudentDetails extends HttpServlet {
    private static final long serialVersionUID = 1L;

    protected void doGet(HttpServletRequest request, HttpServletResponse response) 
            throws ServletException, IOException {
        String regNo = request.getParameter("regNo");
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        if (regNo == null || regNo.isEmpty()) {
            out.println("<p>Please select a registration number.</p>");
            return;
        }

        try {
            Connection conn = DatabaseConnection.getConnection();
            String query = "SELECT * FROM students WHERE reg_no = ?";
            PreparedStatement stmt = conn.prepareStatement(query);
            stmt.setInt(1, Integer.parseInt(regNo));
            ResultSet rs = stmt.executeQuery();

            if (rs.next()) {
                out.println("<p><strong>Registration No:</strong> " + rs.getInt("reg_no") + "</p>");
                out.println("<p><strong>Name:</strong> " + rs.getString("name") + "</p>");
                out.println("<p><strong>Department:</strong> " + rs.getString("department") + "</p>");
                out.println("<p><strong>Year:</strong> " + rs.getInt("year") + "</p>");
            } else {
                out.println("<p>No student found with registration number " + regNo + "</p>");
            }

            conn.close();
        } catch (Exception e) {
            out.println("<p>Error: " + e.getMessage() + "</p>");
        }
    }
}
