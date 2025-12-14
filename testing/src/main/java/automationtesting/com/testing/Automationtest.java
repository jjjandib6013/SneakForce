package automationtesting.com.testing;


import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;

public class Automationtest {

    public static void main(String[] args) {

        WebDriver driver = new ChromeDriver();
        driver.get("http://localhost:8000/login");
        driver.manage().window().maximize();

        WebElement username = driver.findElement(By.name("email"));
        username.sendKeys("jandib@gmail.com");

        WebElement password = driver.findElement(By.name("password"));
        password.sendKeys("jandiblowis");

        WebElement loginButton = driver.findElement(By.name("submit"));
        loginButton.click();

        try {
            Thread.sleep(5000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        driver.get("http://localhost:8000/collection");
        driver.manage().window().maximize();

        WebElement addToCartButton1 = driver.findElement(By.name("addToCart-1"));
        addToCartButton1.click();

                try {
            Thread.sleep(5000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        driver.get("http://localhost:8000/cart");

        try {
            Thread.sleep(3000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        WebElement checkoutButton = driver.findElement(By.name("checkout"));
        checkoutButton.click();

        WebElement phoneInput = driver.findElement(By.name("phone"));
        phoneInput.sendKeys("09949069496");

        try {
            Thread.sleep(1000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        WebElement addressInput = driver.findElement(By.name("address"));
        addressInput.sendKeys("09949069496");

                try {
            Thread.sleep(1000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        WebElement cityInput = driver.findElement(By.name("city"));
        cityInput.sendKeys("Lapu-Lapu City");

                try {
            Thread.sleep(1000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        WebElement provinceInput = driver.findElement(By.name("province"));
        provinceInput.sendKeys("Cebu");

                try {
            Thread.sleep(1000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        WebElement postalCodeInput = driver.findElement(By.name("postal_code"));
        postalCodeInput.sendKeys("6015");

                try {
            Thread.sleep(1000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        WebElement codSelector = driver.findElement(By.name("cod"));
        codSelector.click();

                try {
            Thread.sleep(1000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        WebElement placeOrderButton = driver.findElement(By.name("submit"));
        placeOrderButton.click();

                try {
            Thread.sleep(1000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        

                try {
            Thread.sleep(10000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        driver.get("http://localhost:8000/orders");








            

        // Close browser
        //driver.quit();
    }
}