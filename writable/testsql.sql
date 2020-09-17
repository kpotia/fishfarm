SELECT
    food_history.fh_id,
    food_history.tank_id,
    food.name as foodname,
    food_history.fish_id as fishname,
    food_history.qty,
    food_history.date
FROM
    food_history 
INNER JOIN fish_tank
ON
    food_history.tank_id = fish_tank.fish_id
INNER JOIN food
ON
    food_history.food_id = food.fd_id