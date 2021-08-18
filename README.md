## Models

- Barista
  - Espresso machine ["amount_of_coffee"]
  - must refill coffee(takes time)
  
- Barmen

- Customer

- Order

● Espresso (35 seconds / 7 grams) - 1$
● Espresso doppio (45 seconds / 14 grams) - 2$
● Cappuccino (60 seconds / 7 grams) - 2.5$

Each type of coffee takes a fixed amount of time for the barista to complete it.
Also each type of
coffee takes a certain amount of coffee in grams.

full coffee capacity which is 300 grams

This action takes him 2 minutes. During this time, he cannot make new coffees.

Ordering types
 1. Order for table (For this kind of order, customers are notified when the coffee is ready, so they can just pick it up.)
 2. Coffee to go

Coffee to go is ordered at the bar. The barman takes these orders and passes them to available
baristas. If all baristas are busy (already making the coffee), the barman will accept up to 5
order.

Requirements:
● Placing the order to the bartender is done by the simple HTTP endpoint.
● Placing the order using WebUI invokes another HTTP endpoint.
● If the order is accepted, successful HTTP response is returned (without waiting for coffee
to be made)
● If ordering is not possible, an unsuccessful HTTP response is returned.
● The WebUI should show a nice picture of each available coffee. People just don't know
the difference between cappuccino and macchiato.
● All orders from WebUI are accepted (there is no limit)
● WebUI should notify user that his coffee is ready

Requirements:
● Backend must expose endpoints to the following operations.
○ add/remove/modify coffees
■ Price
■ Type
■ Picture
■ Amount of coffee in grams
■ Time necessary to brew
● No UI is necessary for admin operations.
