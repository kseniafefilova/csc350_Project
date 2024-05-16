CREATE TABLE Admin (
                       AdminID INT PRIMARY KEY,
                       FirstName VARCHAR(50),
                       Email VARCHAR(50) UNIQUE,
                       Password VARCHAR(50)
);

INSERT INTO Admin (AdminID, FirstName, Email, Password)
VALUES
    (1, 'Florian', 'florian@gmail.com', 'Flo'),
    (2, 'Meme', 'meme@gmail.com', 'Me'),
    (3, 'Ksenia', 'ksenia@gmail.com', 'Ksen'),
    (4, 'Halil', 'halil@gmail.com', 'Hal');


CREATE TABLE Meals (
                       MealID INT PRIMARY KEY,
                       MealName VARCHAR(50),
                       MealPrice DECIMAL(5,2),
                       MealDescription VARCHAR(100),
                       MealImage VARCHAR(100),
                       MealRecipe VARCHAR(100),
                       ProteinCount DECIMAL(5,2),
                       CaloriesCount DECIMAL(5,2),
                       CarbsCount DECIMAL(5,2),
                       CookTime DECIMAL(5,2)
);


INSERT INTO Meals (MealID, MealName, MealPrice, MealDescription, MealImage, MealRecipe, ProteinCount, CaloriesCount, CarbsCount, CookTime)
VALUES
    (1, 'Peanut Butter Sandwich', 1.50, 'Classic peanut butter sandwich', 'https://example.com/images/peanut_butter_sandwich.jpg', 'https://example.com/recipes/peanut_butter_sandwich', 8.00, 200.00, 25.00, 5.00),
    (2, 'Grilled Cheese Sandwich', 2.00, 'Toasted bread with melted cheese', 'https://example.com/images/grilled_cheese_sandwich.jpg', 'https://example.com/recipes/grilled_cheese_sandwich', 10.00, 300.00, 30.00, 10.00),
    (3, 'Instant Ramen', 1.00, 'Quick and easy instant noodles', 'https://example.com/images/instant_ramen.jpg', 'https://example.com/recipes/instant_ramen', 5.00, 350.00, 40.00, 5.00),
    (4, 'Egg Salad Sandwich', 2.50, 'Egg salad on whole wheat bread', 'https://example.com/images/egg_salad_sandwich.jpg', 'https://example.com/recipes/egg_salad_sandwich', 12.00, 250.00, 28.00, 10.00),
    (5, 'Pasta with Tomato Sauce', 3.00, 'Pasta with simple tomato sauce', 'https://example.com/images/pasta_with_tomato_sauce.jpg', 'https://example.com/recipes/pasta_with_tomato_sauce', 10.00, 400.00, 70.00, 15.00),
    (6, 'Chicken Quesadilla', 3.50, 'Grilled tortilla with chicken and cheese', 'https://example.com/images/chicken_quesadilla.jpg', 'https://example.com/recipes/chicken_quesadilla', 15.00, 450.00, 50.00, 15.00),
    (7, 'Vegetable Stir Fry', 4.00, 'Mixed vegetables with soy sauce', 'https://example.com/images/vegetable_stir_fry.jpg', 'https://example.com/recipes/vegetable_stir_fry', 7.00, 250.00, 35.00, 20.00),
    (8, 'Tuna Salad', 2.50, 'Tuna mixed with mayo and celery', 'https://example.com/images/tuna_salad.jpg', 'https://example.com/recipes/tuna_salad', 20.00, 200.00, 5.00, 5.00),
    (9, 'Oatmeal', 1.50, 'Warm oatmeal with honey', 'https://example.com/images/oatmeal.jpg', 'https://example.com/recipes/oatmeal', 6.00, 150.00, 30.00, 5.00),
    (10, 'Mac and Cheese', 2.00, 'Creamy macaroni and cheese', 'https://example.com/images/mac_and_cheese.jpg', 'https://example.com/recipes/mac_and_cheese', 10.00, 300.00, 40.00, 15.00),
    (11, 'Chicken Wrap', 3.00, 'Grilled chicken with lettuce in a wrap', 'https://example.com/images/chicken_wrap.jpg', 'https://example.com/recipes/chicken_wrap', 15.00, 350.00, 40.00, 10.00),
    (12, 'Veggie Burger', 3.50, 'Burger with a veggie patty', 'https://example.com/images/veggie_burger.jpg', 'https://example.com/recipes/veggie_burger', 8.00, 300.00, 40.00, 10.00),
    (13, 'Fruit Salad', 2.00, 'Mixed fresh fruits', 'https://example.com/images/fruit_salad.jpg', 'https://example.com/recipes/fruit_salad', 2.00, 100.00, 25.00, 5.00),
    (14, 'Scrambled Eggs', 1.50, 'Fluffy scrambled eggs', 'https://example.com/images/scrambled_eggs.jpg', 'https://example.com/recipes/scrambled_eggs', 12.00, 200.00, 2.00, 5.00),
    (15, 'Cheese Omelette', 2.50, 'Omelette with cheese', 'https://example.com/images/cheese_omelette.jpg', 'https://example.com/recipes/cheese_omelette', 15.00, 250.00, 2.00, 10.);
