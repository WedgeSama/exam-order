Exam order
==========

Small soft use to randomly generate an exam order.

## Usage

### Get your seed
Generate a seed for your exam:

```
php seed-generator.php
```

You will get something like that:
```
Random seed generated: 522fdeba88b7715d428e
```

The seed is used to replay the order generation to get the same result.

### Get your exam order

```
php get-order.php [numberOfGroups] [seed]
```

Example
```
php get-order.php 10 522fdeba88b7715d428e
```

You will get something like that:
```
Groups order:
Group n°3
Group n°5
Group n°8
Group n°1
Group n°10
Group n°9
Group n°4
Group n°6
Group n°2
Group n°7
```

### Make your groups

```
php group-maker.php [perGroupNumber] [seed]
```

You have to create a `names.json` file in root project directory., See [name.json.dist](name.json.dist) for an example.

Example
```
php group-maker.php 3 522fdeba88b7715d428e
```

You will get something like that:
```
Group n°1:
ikoelpin
beier.marc
hane.christina

Group n°2:
monty93
wondricka
elinore23

Group n°3:
celia68
haley.cleve
erna39

Group n°4:
braun.larue
xernser
```

## License

MIT
