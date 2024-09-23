library(lmodel2)
library(ppcor)
library(boot)

setwd("D:/IGDB/courses/SDC/class4")
GSE6536 <-  read.table("GSE6536_series_matrix_trio_ensembl_avg_list.txt", header = T)
str(GSE6536)

(Lm <- lm(rnorm(30) ~ rnorm(30)))
plot(rnorm(30) ~ rnorm(30))
abline(Lm)
summary(Lm)

A <- rnorm(30)
(Lm <- lm(A * 2 ~ A))
plot(A * 2 ~ A)
abline(Lm)
summary(Lm)
str(Lm)

B <- A + rnorm(30)
lm(B ~ A)
lm(A ~ B)

cor.test(rnorm(30), rnorm(30))
A <- rnorm(30)
cor.test(A, A * 2)
plot(rnorm(30), rnorm(30))
plot(A * 2 ~ A)
abline(lm(A * 2 ~ A))

B <- A + rnorm(30)
plot(B ~ A)
(Cor <- cor.test(A, B))
str(Cor)
# the meaning of r2

plot(B ~ A)
abline(lm(B ~ A))
Lm_t <- lm(A ~ B)
Lm_t$coefficients
Slope <- 1 / Lm_t$coefficients[2]
Intercept <- -Lm_t$coefficients[1] / Lm_t$coefficients[2]
abline(a = Intercept, b = Slope)

Df <- as.data.frame(cbind(B, A))
Lm2 <- lmodel2 (B ~ A, data = Df)
lines(Lm2)


#spearman's correlation
D <- c(A, 30)
E <- c(-A, 30)
cor.test(E, D)
plot(D, E)

cor.test(E, D, method = "s")
cor.test(1:30, c(29:1, 30), method = "p")

#spearman's correlation may not always work
#introduction to kendall's tau test
D <- c(A, A - 30)
E <- c(A, A + 30)
cor.test(E, D)
plot(D, E)
cor.test(E, D, method = "s")
cor.test(E, D, method = "k")

#introduction to a dataset
?mtcars
str(mtcars)
cor(mtcars)
plot(mtcars)

#general linear regression
lm(mtcars$mpg ~ mtcars$cyl)
summary(lm(mtcars$mpg ~ mtcars$cyl))
summary(aov(mtcars$mpg ~ mtcars$cyl))

#multiple regression
summary(lm(mtcars$mpg ~ mtcars$cyl + mtcars$wt))

#partial correlation
cor(mtcars[, c(1, 2, 6)])
pcor(mtcars[, c(1, 2, 6)])
pcor(mtcars[, c(1, 2, 6)], method = "s")

#bootstrap
summary(lm(mtcars$mpg ~ mtcars$wt))
rsq <- function(fomula, data, indices) {
  return(summary(lm(fomula, data = data[indices,]))$r.square)
}
Boot <- boot(data = mtcars, statistic = rsq,
             R=1000, fomula = mpg ~ wt)
Boot
plot(Boot)
boot.ci(Boot)