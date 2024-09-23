source("http://bioconductor.org/biocLite.R")
biocLite("qvalue")

library(qvalue) 
str(GSE6536)
Genes <- levels(GSE6536$gene)
for (i in 1: length(Genes)) {
  wilcox.test(GSE6536$father_expr[GSE6536$gene == Genes[i]], 
              GSE6536$mother_expr[GSE6536$gene == Genes[i]],
              paired = T)
}

P_val <- vector(length = 100)
for (i in 1: 100) {
  P_val[i] <- wilcox.test(GSE6536$father_expr[GSE6536$gene == Genes[i]], 
              GSE6536$mother_expr[GSE6536$gene == Genes[i]],
              paired = T)$p.value
}
sum(P_val < 0.05)

P_val_sim <- vector(length = 1000)
for (i in 1:1000){
  P_val_sim[i] <- t.test(rnorm(20), rnorm(20))$p.value
}
sum(P_val_sim <= 0.05)
hist(P_val_sim)

hist(P_val)

#introudction to FDR
qobj_sim <- qvalue(P_val_sim)
sum(qobj_sim$qvalues <= 0.05)

qobj <- qvalue(P_val)
sum(qobj$qvalues <= 0.05)
 