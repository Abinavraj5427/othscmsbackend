import java.util.*;
import java.io.*;
public class sketch{

    public static void main(String[] args) throws Exception{
        Scanner scan = new Scanner(new File("sketch.dat"));
        char[] ch = {'!','@','#','$', '%','&'};
        while(scan.hasNextLine()){
        int x =  scan.nextInt();
        int n = scan.nextInt();
        int ca =  scan.nextInt();
        char a = ch[ca];
        boolean fill = scan.nextBoolean();
        
        if(x == 0){
             for(int r = 0; r< n; r++){
                 for(int c = 0; c<n; c++){
                    if(fill)
                        System.out.print(a);
                    else if(!fill && (r == 0 || c== 0||c==n-1||r==n-1))
                        System.out.print(a);
                    else
                        System.out.print(' ');
                 }
                 System.out.println();
             }
        }
        if(x ==1){
            for(int r = 0; r< n; r++){
                for(int c = 0; c<n; c++){
                   if(fill && r+c < n)
                       System.out.print(a);
                   else if(!fill && (r == 0 || c== 0||r==c)&& (r+c)<n)
                       System.out.print(a);
                   else
                       System.out.print(' ');
                }
                System.out.println();
            }
       }
       if(x == 2){
        for(int r = 0; r< n; r++){
            for(int c = 0; c<n; c++){
               if(fill && r+c > n)
                   System.out.print(a);
            else if(!fill && (r == 0 || c== 0||r==c)&& (r+c)>n)
                   System.out.print(a);
               else
                   System.out.print(' ');
            }
            System.out.println();
        }
   }
   if(x == 3){
    for(int r = 0; r< n; r++){
        for(int c = 0; c<n; c++){
           if(fill && r<=c)
               System.out.print(a);
           else if(!fill && (r == 0 || c== 0||r==c)&& r<=c)
               System.out.print(a);
           else
               System.out.print(' ');
        }
        System.out.println();
    }
}
if(x == 4){
    for(int r = 0; r< n; r++){
        for(int c = 0; c<n; c++){
           if(fill&& r+c>n)
               System.out.print(a);
           else if(!fill && (r == 0 || c== 0|| r==c)&& r+c>n)
               System.out.print(a);
           else
               System.out.print(' ');
        }
        System.out.println();
    }
}
       
scan.nextLine();
    }
    
}
}