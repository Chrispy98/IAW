public class TBD {
    private static int a=0;
    private static int b;
    private static int c;
    private static boolean bNeg=false;
    private static boolean cNeg=false;
    public TBD(int b, int c){
        this.b=b;
        this.c=c;
    }

    private static boolean n1Mayor (int n1, int n2){
        return n1 > n2;
    }

    private static int factorial (int num){
        return factorial(num,num);
    }

    private static int factorial (int num, int res){
        if (num==1){
            return res;
        }
        return factorial(num-1, res*(num-1));
    }

    public static int calcula (){
        bNeg=n1Mayor(a,b);
        cNeg=n1Mayor(a,c);
        if (bNeg || cNeg){
            return -1;
        }
        else {
            b=factorial(b);
            c=factorial(c);
        }
        return b+c;
    }

    public static int getBPlus100(){
        b=b+100;
        return b;
    }

    public static void main (String [] args){
        TBD a=new TBD(2,3);
        System.out.println(a.calcula());
        System.out.println(a.getBPlus100());
    }
}