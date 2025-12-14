package automationtesting.com.testing;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;

public class LMSCanvasLoginTest {

    public static void main(String[] args) {

       
        WebDriver driver = new ChromeDriver();


        driver.get("https://universityofcebu.instructure.com/");

     
        driver.manage().window().maximize();

      
        WebElement emailField = driver.findElement(By.id("pseudonym_session_unique_id"));
        emailField.sendKeys("your_username");

        WebElement passwordField = driver.findElement(By.id("pseudonym_session_password"));
        passwordField.sendKeys("your_password");

   
        WebElement loginButton = driver.findElement(By.name("commit"));
        loginButton.click();

       
        try {
            Thread.sleep(5000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        //driver.quit();
    }
}
