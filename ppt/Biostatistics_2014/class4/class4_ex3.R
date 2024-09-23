library(gplots)
Expr_Chr <- aov(GSE6536$offspring_expr ~ GSE6536$chrom)
summary(Expr_Chr)
anova(Expr_Chr)

plot(GSE6536$offspring_expr ~ GSE6536$chrom)
plotmeans(GSE6536$offspring_expr ~ GSE6536$chrom)

Expr_Sex <- aov(GSE6536$offspring_expr ~ GSE6536$sex)
summary(Expr_Sex)
(T <- t.test(GSE6536$offspring_expr[GSE6536$sex == "d"],
       GSE6536$offspring_expr[GSE6536$sex == "s"]))


Expr_Race_Sex <- aov(GSE6536$offspring_expr ~ GSE6536$race + GSE6536$sex)
summary(Expr_Race_Sex)

Expr_Race_Sex_Inter <- aov(GSE6536$offspring_expr ~ GSE6536$race * GSE6536$sex)
summary(Expr_Race_Sex_Inter)
interaction.plot(GSE6536$race, GSE6536$sex, GSE6536$offspring_expr)

