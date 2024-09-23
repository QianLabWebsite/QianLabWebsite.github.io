#class 2 example 1  if seating is indenpent to gender

(a <- matrix(c(5,6,1,6), nrow =2, byrow = T))

#Pearson's Chi square test
library(stats)
chisq.test(a)

#Without Yates' correction
(Chisq <- (3/11 + 3/22 + 3/7 + 3/14) * (4/3)^2)
pchisq(Chisq, 1, lower.tail = F)

#With Yates' correction
(Chisq <- (3/11 + 3/22 + 3/7 + 3/14) * (4/3 - 0.5)^2)
pchisq(Chisq, 1, lower.tail = F)

#permutation test
chisq.test(a, simulate.p.value= T)

#chi square test is in general not recommended

#Fisher's exact test
#probability of observing a
(Pr <- choose(11,5) * choose(7,1) / choose(18,6))

choose(11,6)*choose(7,0)/choose(18,6)

Fisher <- vector(length = 7)
for (i in 0:6) Fisher[i + 1] <- choose(11,i) * choose(7, 6 - i) / choose(18,6)
names(Fisher) <-0:6
Fisher
sum (Fisher)

#results from the fisher's exact test
sum (Fisher[Fisher <= Pr])

#fisher's exact test
fisher.test(a)

#what is odds ratio?

#results from permutation
chisq.test(a, simulate.p.value= T)
chisq.test(a, simulate.p.value= T, B=200000)

#what if p value is not smaller than 0.05?
(a10 <- a * 10)
fisher.test(a10)

#

#law of large numbers
#but we cannot simply multiply numbers
#combine multiple classes

#Mantel-Haenszel test
(Comb <- array(rep(a, 10), dim = c(2, 2, 5)))
mantelhaen.test(Comb)

