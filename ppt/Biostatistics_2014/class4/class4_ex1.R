library("stats")

setwd("D:/IGDB/courses/SDC/class4")
GSE6536 <-  read.table("GSE6536_series_matrix_trio_ensembl_avg_list.txt", header = T)
str(GSE6536)
levels(GSE6536$chrom)

#male female difference on gene expression?
#method 1 student's t test
#pen name of William Sealy Gosset
Gene <- "ENSG00000000003"
t.test(GSE6536$offspring_expr[GSE6536$gene == Gene & GSE6536$sex == "d"], 
       GSE6536$offspring_expr[GSE6536$gene == Gene & GSE6536$sex == "s"])

#following t distribution
x <- -100:100 / 20
y <- dnorm(x)
plot(y ~ x)
Col <- gray(0:9 / 10)
for (i in 1:10) lines(dt(x, i) ~ x, col = Col[i])

#f test
var.test(GSE6536$offspring_expr[GSE6536$gene == Gene & GSE6536$sex == "d"], 
       GSE6536$offspring_expr[GSE6536$gene == Gene & GSE6536$sex == "s"])

?df
x <- 1:1000 / 100
d <- df(x, 1, 1)
plot(d ~ x)
for (i in 2:10){
  d <- df(x, 1, i)
  lines(d ~ x)
}

x <- 1:1000 / 100
d <- df(x, 1, 1)
plot(d ~ x)
for (i in 2:10){
  d <- df(x, i, 1)
  lines(d ~ x)
}

x <- 1:1000 / 100
d <- df(x, 1, 1)
plot(d ~ x)
for (i in 2:10){
  d <- df(x, i, 10)
  lines(d ~ x)
}

#don't need to worry about var.test, t.test does it for you

#but you do need to worry about if the data follows normal distribution
#to test if the data follow normal distribution
ks.test(x = GSE6536$offspring_expr[GSE6536$gene == Gene & GSE6536$sex == "d"], 
        y = rnorm(length(GSE6536$offspring_expr[GSE6536$gene == Gene & GSE6536$sex == "d"]), 
                  mean(GSE6536$offspring_expr[GSE6536$gene == Gene & GSE6536$sex == "d"]),
                  sd(GSE6536$offspring_expr[GSE6536$gene == Gene & GSE6536$sex == "d"]))
        )

ks.test(x = GSE6536$offspring_expr[GSE6536$gene == Gene & GSE6536$sex == "d"], 
        y = "pnorm",
        mean(GSE6536$offspring_expr[GSE6536$gene == Gene & GSE6536$sex == "d"]),
        sd(GSE6536$offspring_expr[GSE6536$gene == Gene & GSE6536$sex == "d"])
)

shapiro.test(GSE6536$offspring_expr[GSE6536$gene == Gene & GSE6536$sex == "d"])

#method 2 rank sum test
t.test(rnorm(20), rnorm(20))

t.test(c(rnorm(16), rnorm(4, 20)), rnorm(20))
wilcox.test(c(rnorm(16), rnorm(4, 20)), rnorm(20))
hist(c(rnorm(16), rnorm(4, 20)))
plot(density(c(rnorm(16), rnorm(4, 20))), ylim = c(0, 0.5))
lines(density(rnorm(20)), col ="red")

#method 3 permutation test
(A <- c(rnorm(16), rnorm(4, 20)))
(B <- rnorm(20))

t.test(A, B)
(Union <- c(A, B))
length(Union)
(D <- mean(A) - mean(B))

#similar to t test 
L <- 10000
Diff <- vector(mode = "numeric", length = L)
for (i in 1:L) {
  S <- sample(Union, 40, replace = F) 
  Diff[i] <- mean(S[1:20]) - mean(S[21:40])
}
(D <- mean(A) - mean(B))
(P_val <- sum(Diff >= D | Diff <= -D) / L)
t.test (A, B)

#similar to wilcox test
for (i in 1:L) {
  S <- sample(Union, 40, replace = F) 
  Diff[i] <- median(S[1:20]) > median(S[21:40])
}
(P_val <- sum(Diff) / L)

for (i in 1:L) {
  S <- sample(Union, 40, replace = F) 
  Diff[i] <- mean(S[1:20]) > mean(S[21:40])
}
(P_val <- sum(Diff) / L)

wilcox.test (A, B)

#method 4 ks.test
t.test(c(rnorm(10), rnorm(10, 10)), rnorm(20, 5))
wilcox.test(c(rnorm(10), rnorm(10, 10)), rnorm(20, 5))

#but you know that it should be different
plot(density(c(rnorm(10), rnorm(10, 10))), ylim = c(0, 0.5))
lines(density(rnorm(20, 5)), col ="red")

#compare the distribution by ks. test
ks.test(c(rnorm(10), rnorm(10, 10)), rnorm(20, 5))

##pair test
t.test(GSE6536$father_expr[GSE6536$gene == Gene], 
       GSE6536$mother_expr[GSE6536$gene == Gene])

t.test(GSE6536$father_expr[GSE6536$gene == Gene], 
       GSE6536$mother_expr[GSE6536$gene == Gene],
       paired = T)