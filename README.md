# aiodinAssessment

Question 1:
https://www.epcombb.org/mySchool/question1.html
*Sorry I cannot figure out the solution for this criterion: 
If the user tries to download again within the 5 seconds waiting time, it should return a message "Too many downloads".

Question 2:
https://www.epcombb.org/mySchool/question2.html

Question 3:
Use postman to test
https://www.epcombb.org/mySchool/api/1.0/aiodinAssessment/question3

Question 4: 
https://www.epcombb.org/mySchool/question4.html

Question 5
1.	No
2.	Put the user id for order under the TBL_TRANSACTION, meaning to say combining the transaction and order table
3.	SQL Query
(a)	SELECT c.name, COUNT(c.userid) AS num_spend
FROM `customer` c
INNER JOIN `order` o ON c.userid = o.userid
GROUP BY c.userid
LIMIT 1
(b)	SELECT t.item 
FROM `order` o
INNER JOIN `transaction` t ON o.orderid = t.orderid
INNER JOIN `customer` c ON o.userid = c.userid
WHERE o.userid = 1
(c)	SELECT day(transaction_date) as Day, hour(transaction_date) as Hour, COUNT(*) as number_of_transaction
FROM transaction
GROUP BY day(transaction_date), hour(transaction_date)
